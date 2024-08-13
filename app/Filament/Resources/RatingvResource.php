<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Ratingv;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Mokhosh\FilamentRating\Components\Rating;
use App\Filament\Resources\ReatingvResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RatingvResource\Pages\EditRatingv;
use App\Filament\Resources\ReatingvResource\RelationManagers;
use App\Filament\Resources\RatingvResource\Pages\ListRatingvs;
use App\Filament\Resources\RatingvResource\Pages\CreateRatingv;

class RatingvResource extends Resource
{
    protected static ?string $model = Ratingv::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'المتطوعين';

    protected static ?string $navigationLabel = 'تقيمات المتطوعين';
    protected static ?string $pluralModelLabel  = 'تقيمات المتطوعين';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('volunteer_id')
                        ->relationship('volunteer','name')
                        ->label('أسم المتطوع')
                        ->searchable(['name', 'phone','status'])
                        ->placeholder('اختر اسماءالمتطوعين')
                        ->columnSpan(1),
                        DatePicker::make('date')
                        ->label('تاريخ ')
                        ->default(now())
                        ->columnSpan(1)
                        ->required(),
                        Rating::make('commitment')
                        ->label('الالتزام')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Rating::make('following')
                        ->label('التابعية')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Rating::make('mixing')
                        ->label('الاختلاط')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Rating::make('head_rating')
                        ->label('تقيم هيد اللجنة')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Checkbox::make('famliyday')
                        ->label('اليوم العائلي')
                        ->columnSpan(1),
                        Checkbox::make('ma3red')
                        ->label('المعرض')

                        ->columnSpan(1),
                       


            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('volunteer.name')
                ->label('الاسم')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('volunteer.phone')
                ->label('رقم الهاتف')
                ->prefix('0')
                ->searchable()
                ->copyable(),
                TextColumn::make('volunteer.status')
                ->label('التصنيف')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'شبل' => 'warning',
                    'داخل المتابعة' => 'warning',
                    'مشروع مسئول' => 'success',
                    'مسئول' => 'success',
                    'خارج المتابعة' => 'danger',
                })
                ->sortable(),
                TextColumn::make('total')
                    ->label('اجمالي التقيم')
                    ->getStateUsing(function ($record) {
                        // Replace col1, col2, col3 with your actual column names
                        $famliyday = 0;  

                        if($record->famliyday == 1){
                            $famliyday = $record->famliyday;
                            $famliyday = 100;  

                        };
                        return $record->commitment + $record->following + $record->mixing+ $record->head_rating +$famliyday
                        ;
                })
                ,
           
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' =>  ListRatingvs::route('/'),
            'create' => CreateRatingv::route('/create'),
            'edit' =>   EditRatingv::route('/{record}/edit'),
        ];
    }
}
