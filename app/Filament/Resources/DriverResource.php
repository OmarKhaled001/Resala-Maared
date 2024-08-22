<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Driver;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Mokhosh\FilamentRating\Components\Rating;
use App\Filament\Resources\DriverResource\Pages;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\DriverResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;

    protected static ?string $navigationGroup = 'الفعاليات';
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'السائقين';
    protected static ?string $pluralModelLabel  = 'السائقين';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('الاسم')
                ->placeholder('ادخل اسم السائق')
                ->required()
                ->columnSpan(2),
                TextInput::make('phone')
                ->label('رقم الهاتف')
                ->placeholder('ادخل رقم السائق')
                ->required()
                ->columnSpan(2),
                TextInput::make('national')
                ->label('رقم الرخصة')
                ->placeholder('ادخل رقم الرخصة')
                ->required()
                ->columnSpan(2),
                Rating::make('rating')
                ->stars(10)
                ->default(1)
                ->label('ألتقيم')
                ->columnSpan(2),


                Textarea::make('notes')
                ->label('الملاحظات')
                ->columnSpan(2),
                SpatieMediaLibraryFileUpload::make('driver')
                ->collection('drivers')
                ->multiple()
                ->downloadable()
                ->label('صورة الرخصة او الغرامات')
                ->downloadable()
                ->columnSpan(2)
            ])
            ;
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
                TextColumn::make('phone')
                ->label('رقم الهاتف')
                ->searchable()
                ->copyable(),
                TextColumn::make('national')
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
                Tables\Actions\ViewAction::make()->label('مشاهدة'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
                Tables\Actions\EditAction::make()->label('تعديل'),
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
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
