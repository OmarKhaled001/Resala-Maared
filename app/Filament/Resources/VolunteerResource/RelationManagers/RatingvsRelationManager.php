<?php

namespace App\Filament\Resources\VolunteerResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;

class RatingvsRelationManager extends RelationManager
{
    protected static string $relationship = 'ratingvs';
 

 

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                Tables\Columns\TextColumn::make('date'),
                TextColumn::make('commitment')
                ->suffix('/10')
                ->label('الالتزام'),
                TextColumn::make('following')
                ->suffix('/10')

                ->label('التابعية'),
                TextColumn::make('mixing')
                ->suffix('/10')

                ->label('الاختلاط'),
                TextColumn::make('head_rating')
                ->suffix('/10')

                ->label('تقيم هيد اللجنة'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
         
            ])
            ->bulkActions([
            
            ]);
    }
}
