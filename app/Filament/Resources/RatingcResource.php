<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ratingc;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Mokhosh\FilamentRating\Components\Rating;
use App\Filament\Resources\ReatingcResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RatingcResource\Pages\EditRatingc;
use App\Filament\Resources\ReatingcResource\RelationManagers;
use App\Filament\Resources\RatingcResource\Pages\ListRatingcs;
use App\Filament\Resources\RatingcResource\Pages\CreateRatingc;

class RatingcResource extends Resource
{
    protected static ?string $model = Ratingc::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'اللجان';

    protected static ?string $navigationLabel = 'تقيمات اللجان';
    protected static ?string $pluralModelLabel  = 'تقيمات اللجان';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        Select::make('category_id')
                        ->relationship('category','name')
                        ->label('أسم اللجنة')
                        ->preload()
                        ->searchable(['name'])
                        ->columnSpan(1)
                        ->required()
                        ->placeholder('اختر اللجنة'),
                        DatePicker::make('date')
                        ->label('تاريخ ')
                        ->default(now())
                        ->columnSpan(1)
                        ->required(),
                        Select::make('ranking')
                        ->options([
                            '300' => 'الاول',
                            '200' => 'الثاني',
                            '100' => 'الثالث',
                            '50' => 'الرابع',
                        ])
                        ->placeholder('اختر المركز')
                        ->label('المركز')->columnSpan(1),
                        
                        TextInput::make('points')
                        ->label('النقاط')
                        ->placeholder('النقاط ')
                        ->numeric()
                        ->columnSpan(1),

                        Rating::make('commitment')
                        ->label('الالتزام')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Rating::make('mixing')
                        ->label('الاختلاط')
                        ->stars(10)
                        ->default(1)
                        ->columnSpan(1),
                        Checkbox::make('plan')
                        ->label('أرسال الخطة')
                        ->columnSpan(1),
                        Checkbox::make('warning')
                        ->label('انذار')
                        ->columnSpan(1),
                        RichEditor::make('notes')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->label('التقرير')
                        ->columnSpan(2),
                      
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                ->label('الاسم')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('total')
                    ->label('اجمالي التقيم')
                    ->getStateUsing(function ($record) {
                        // Replace col1, col2, col3 with your actual column names
                        if($record->plan == 1){
                            $plan = $record->plan;
                            $plan = 200;  

                        };
                        return $record->ranking + $record->commitment + $record->mixing +$plan
                        ;
                })
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
            'index' => ListRatingcs::route('/'),
            'create' => CreateRatingc::route('/create'),
            'edit' => EditRatingc::route('/{record}/edit'),
        ];
    }
}
