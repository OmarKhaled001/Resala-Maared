<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Contribution;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContributionResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ContributionResource\RelationManagers;

class ContributionResource extends Resource
{
    protected static ?string $model = Contribution::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'المتطوعين';

    protected static ?string $navigationLabel = 'المشاركات';
    protected static ?string $pluralModelLabel  = 'المشاركات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //
            ]);
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
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('volunteer.categories.name')
                ->label('اللجنة')
                ->searchable()
                ->copyable()
                ->sortable(),
                TextColumn::make('total')
                ->label('الاجمالي')
                ->sortable(),
                //
            ])
            ->filters([
                // SelectFilter::make('volunteer.categories.name')
                // ->relationship('volunteer.categories','name')
                // ->label('اللجنة')
                // ->placeholder('اختر اللجنة')
                // ->preload()
                // ->multiple(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),

                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListContributions::route('/'),
            'create' => Pages\CreateContribution::route('/create'),
            // 'edit' => Pages\EditContribution::route('/{record}/edit'),
        ];
    }
}
