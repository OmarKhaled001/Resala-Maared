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

                TextInput::make('area')
                ->label('اسم القرية')
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
                TextColumn::make('area')
                ->label('الاسم')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('administrator_name')
                ->label('رقم الهاتف')
                ->searchable()
                ->copyable(),
                TextColumn::make('administrator_phone')
                ->label('رقم الرخصة')
                ->searchable()
                ->copyable(),
                RatingColumn::make('rating')
                ->label('التقيم'),
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
            'index' => Pages\ListPlaces::route('/'),
            'create' => Pages\CreatePlace::route('/create'),
            'edit' => Pages\EditPlace::route('/{record}/edit'),
        ];
    }
}
