<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Volunteer;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\VolunteerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Filament\Resources\VolunteerResource\Pages\EditVolunteer;
use App\Filament\Resources\VolunteerResource\Pages\ListVolunteers;
use App\Filament\Resources\VolunteerResource\Pages\CreateVolunteer;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'المتطوعين';

    protected static ?string $navigationLabel = 'المتطوعين';
    protected static ?string $pluralModelLabel  = 'المتطوعين';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('البيانات الاساسية')
                    ->schema([
                        TextInput::make('name')
                        ->label('الاسم')
                        ->placeholder('ادخل اسم المتطوع')
                        ->required()
                        ->columnSpan(1),
                        TextInput::make('phone')
                        ->label('رقم الهاتف')
                        ->placeholder('ادخل رقم المتطوع')
                        ->required()
                        ->columnSpan(1),
                        Select::make('gender')
                        ->options([
                            '1' => 'ذكر',
                            '2' => 'انثي',
                        ])->label('النوع')
                        ->required()
                        ->placeholder('اختر النوع'),
                        DatePicker::make('birthdate')
                        ->displayFormat('d/m/y')
                        ->required()
                        ->label('تاريخ الميلاد'),
                        DatePicker::make('voldate')
                        ->displayFormat('d/m/y')
                        ->required()
                        ->label('تاريخ التطوع'),
                    ])->columnSpan( ['sm' => 1,'lg' => 2,]),
                    Section::make('بيانات اضافية')
                    ->schema([
                     
                        Textarea::make('notes')
                        ->label('الملاحظات'),
                        Textarea::make('address')
                        ->label('العنوان'),
                      
                    ])->columnSpan( ['sm' => 1,'lg' => 2,]),
                    
                    Section::make('الوسائط')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('vol_reseat')
                        ->collection('vol_reseats')
                        ->multiple()
                        ->downloadable()
                        ->label('صورة إيصال ريسلاوي')
                        ->downloadable(),
                        SpatieMediaLibraryFileUpload::make('vol_pic')
                        ->collection('vol_pics')
                        ->multiple()
                        ->downloadable()
                        ->label('صور شخصية')
                        ->downloadable(),
                      
                    ])->columnSpanFull(),
       
            ])->columns([
                'sm' => 1,
                'lg' => 4,
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
                TextColumn::make('phone')
                ->label('رقم الهاتف')
                ->searchable()
                ->copyable(),
            
                 
                SelectColumn::make('status')
                ->label('التصنيف')
                ->searchable()
                ->sortable()
                ->placeholder('اختر التصنيف')
                ->hidden(fn () => !auth()->user()->hasRole('Head'))
                ->options([
                    'مسئول' => 'مسئول',
                    'مشروع مسئول' => 'مشروع مسئول',
                    'داخل المتابعة' => 'داخل المتابعة',
                    'خارج المتابعة' => 'خارج المتابعة',
                    'أشبال' => 'شبل',
                ]),
                TextColumn::make('age')
                ->label('العمر')
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
            
                TextColumn::make('voldate')
                ->label('تاريخ التطوع')
                ->dateTime('M j, Y')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

               
                TextColumn::make('events.date')
                ->dateTime('M j, Y')
                ->label('المشاركات الاخيرة')
                ->toggleable(isToggledHiddenByDefault: true)
                ->listWithLineBreaks()
                ->limitList(3)
                ->copyable()
                ->sortable()
                ->expandableLimitedList(),
            ])
            ->filters([
                SelectFilter::make('status')
                ->options([
                    'مسئول' => 'مسئول',
                    'مشروع مسئول' => 'مشروع مسئول',
                    'داخل المتابعة' => 'داخل المتابعة',
                    'خارج المتابعة' => 'خارج المتابعة',
                    'أشبال' => 'شبل',
                ])->label('التصنيف')
                ->placeholder('اختر التصنيف')
                ->multiple(),
                
                SelectFilter::make('gender')
                ->options([
                    '1' => 'ذكر',
                    '2' => 'انثي',
                
                ])->label('النوع')
                ->placeholder('اختر النوع'),
                SelectFilter::make('voldate')
                ->dateTime('M j, Y')
                ->searchable()
                ->preload()
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(false),
                Tables\Actions\DeleteAction::make()->label(false),
                Tables\Actions\EditAction::make()->label(false),
                ])
            ->bulkActions([
                ExportBulkAction::make(),
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EventsRelationManager::class,
            RelationManagers\RatingvsRelationManager::class,
            RelationManagers\HistoryRelationManager::class,
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }


}
