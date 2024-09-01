<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Place;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Mokhosh\FilamentRating\Components\Rating;
use App\Filament\Resources\PlaceResource\Pages;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\PlaceResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PlaceResource extends Resource
{
    protected static ?string $model = Place::class;
    protected static ?string $navigationGroup = 'الفعاليات';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'الاماكن';
    protected static ?string $pluralModelLabel  = 'الاماكن';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('اسم المكان')
                ->placeholder('ادخل اسم المكان')
                ->required()
                ->columnSpan(2),

                TextInput::make('Governorate')
                ->label('المحافظة')
                ->placeholder('ادخل اسم المحافظة')
                ->required()
                ->columnSpan(2),

                TextInput::make('area')
                ->label('المركز')
                ->placeholder('ادخل اسم المركز')
                ->required()
                ->columnSpan(2),

                TextInput::make('village')
                ->label('القرية')
                ->placeholder('ادخل اسم القرية')
                ->required()
                ->columnSpan(2),

                TextInput::make('administrator_name')
                ->label('اسم الدليل')
                ->placeholder('ادخل اسم الدليل')
                ->required()
                ->columnSpan(2),

                TextInput::make('administrator_phone')
                ->label('رقم الهاتف')
                ->placeholder('ادخل رقم السائق')
                ->required()
                ->columnSpan(2),

                Checkbox::make('is_association')
                ->label('جمعية شرعية')
                ->columnSpan(2),
                Rating::make('rating')
                ->label('التقيم')
                ->default(1)
                ->stars(10)
                ->columnSpan(2),
                
                Textarea::make('location')
                ->label('اللوكيشن')
                ->columnSpan(2),  
                Textarea::make('notes')
                ->label('الملاحظات')
                ->columnSpan(2), 
                SpatieMediaLibraryFileUpload::make('place')
                ->collection('places')
                ->multiple()
                ->downloadable()
                ->label('صور المكان')
                ->downloadable()
                ->columnSpan([
                    'xl' => 4,
                ]),
           

            ])
            
            ->columns([
                'xl' => 4,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('الاسم')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('governorate')
                ->label('المحافظة')
                ->searchable()
                ->copyable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
                TextColumn::make('area')
                ->label('المركز')
                ->searchable()
                ->copyable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
                TextColumn::make('village')
                ->label('القرية')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('administrator_name')
                ->label('اسم الدليل')
                ->searchable()
                ->copyable(),
                TextColumn::make('administrator_phone')
                ->label('رقم الهاتف')
                ->searchable()
                ->copyable(),
                TextColumn::make('location')
                ->label('العنوان')
                ->searchable()
                ->url(
                    function ($record) {
                        return $record->location;
                    }
                ),
                TextColumn::make('rating')
                ->label('التقيم')
                ->suffix('/10'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(false),
                Tables\Actions\DeleteAction::make()->label(false),
                Tables\Actions\EditAction::make()->label(false),
            ])
            ->bulkActions([
                ExportBulkAction::make(),

                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف الكل'),
                ])->label('العمليات'),

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
            'index' => Pages\ListPlaces::route('/'),
            'create' => Pages\CreatePlace::route('/create'),
            'edit' => Pages\EditPlace::route('/{record}/edit'),
        ];
    }


}
