<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use Filament\Forms\Form;
use App\Models\Volunteer;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Count;
use App\Filament\Resources\EventResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EventResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class EventResource extends Resource
{
    protected static ?string $navigationGroup = 'الفعاليات';

    protected static ?string $model = Event::class;
    protected static ?string $navigationLabel = 'الاحداث';
    protected static ?string $pluralModelLabel  = 'الاحداث';

    protected static bool $hasTitleCaseModelLabel = false;


    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Section::make()
                ->columns([
                    'sm' => 1,
                    'xl' => 2,
                ])->schema([
                    DatePicker::make('date')
                        ->label('تاريخ الحدث')
                        ->minDate(now()->subDays(7))
                        ->maxDate(now())
                    ->required(),
    
                    Select::make('volunteer_id')
                        ->createOptionForm([
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
                        ])
                        ->relationship('volunteers','name')
                        ->label('أسم المتطوع')
                        ->placeholder('اختر اسماءالمتطوعين')
                        ->searchable(['name', 'phone','status'])
                        ->multiple()
                    ->required(),
    
                    Select::make('type')
                        ->options([
                            'الاحداث الاوفلاين' => [
                                'اجتماع اوفلاين' => 'اجتماع اوفلاين',
                                'معرض ملابس'  => 'معرض ملابس',
                                'قافلة اطعام' => 'قافلة اطعام',
                                'قافلة سوق' => 'قافلة سوق',
                                'حفلة ابطال تحدي' => 'حفلة ابطال تحدي',
                                'كرنفال' => 'كرنفال',
                                'اعمار' => 'اعمار',
                                'اداريات اوف لاين' => 'اداريات اوف لاين',
                            ],
                            'الاحداث الاونلاين' => [
                                'متابعة' => 'متابعة',
                                'ميديا' => 'ميديا',
                                'اتصالات' => 'اتصالات',
                                'اداريات' => 'اداريات',
                                'اجتماع اون لاين' => 'اجتماع اون لاين',
                            ],
                            'اخري'    => 'اخري',
                        ])->label('نوع المشاركة')
                        ->placeholder('اختر النوع')
                    ->required(),
    
                    TextInput::make('tshirt')
                        ->label('تيشرت رسالة')
                        ->numeric()
                    ->minValue(1),
                ]),
                Section::make()
                ->schema([
                    Textarea::make('notes')
                        ->label('الملاحظات')
                    ->columnSpan(2),
    
                    SpatieMediaLibraryFileUpload::make('event_scren')
                        ->collection('event_screns')
                        ->multiple()
                        ->downloadable()
                        ->label('صورة الحدث')
                        ->downloadable()
                    ->columnSpan(2),
            ]),

            Section::make('بيانات الاجتماع')
                ->schema([
                    TextInput::make('meeting_head')
                    ->label('مسؤول الاجتماع')
                    ->columnSpan(1),
                    TextInput::make('meeting_goals')
                    ->label('هدف الاجتماع')
                    ->columnSpan(1),
                    Select::make('category_id')
                    ->relationship('category','name')
                    ->label('أسم اللجنة')
                    ->placeholder('اختر اللجنة')
                    ->searchable(['name']),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 1,
                        'xl' => 3,
                ])
                ->description('مسؤول عنه هيد الاجتماع    ')
            ->collapsed(),
                
            Section::make('بيانات الحدث الاوف لاين')
            ->schema([

                Select::make('place_id')
                ->createOptionForm([
                        TextInput::make('name')
                        ->label('اسم المكان')
                        ->placeholder('ادخل اسم المكان')
                        ->required()
                        ->columnSpan(1),
                        TextInput::make('administrator_name')
                        ->label('اسم الدليل')
                        ->placeholder('ادخل اسم الدليل')
                        ->required()
                        ->columnSpan(1),
                        TextInput::make('administrator_phone')
                        ->label('رقم الهاتف')
                        ->placeholder('ادخل رقم السائق')
                        ->required()
                        ->columnSpan(1),
                        Toggle::make('is_admin')
                        ->label('جمعية شرعية')
                        ->required()
                        ->columnSpan(1),
                        Textarea::make('notes')
                        ->label('الملاحظات')
                        ->columnSpan(1),                                
                ])
                ->relationship('place','name')
                ->label('أسم المكان')
                ->placeholder('اختر اسم المكان')
                ->searchable(['name', 'administrator_name'])
                ->preload(),

            Select::make('driver_id')
                ->createOptionForm([
                    TextInput::make('name')
                        ->label('الاسم')
                        ->placeholder('ادخل اسم السائق')
                        ->required(),
                        TextInput::make('phone')
                        ->label('رقم الهاتف')
                        ->placeholder('ادخل رقم السائق')
                        ->required(),
                        TextInput::make('national')
                        ->label('رقم الرخصة')
                        ->placeholder('ادخل رقم الرخصة')
                        ->required(),
                        
                ])
                ->relationship('driver','name')
                ->label('أسم السائق')
                ->placeholder('اختر اسم السائق')
                ->searchable(['name', 'phone'])
                ->preload()
                ->columnSpan([
                    'sm' => 1,
                    'md' => 2,
                    'xl' => 2,
                ]),
            
            TimePicker::make('arrived_at')
            ->label('وقت الحضور'),
            TimePicker::make('move_at')
            ->label('وقت التحرك'),
            TimePicker::make('back_at')
            ->label('وقت العودة'),

            Textarea::make('notes')
                ->label('الملاحظات') ->columnSpan([
                    'sm' => 1,
                    'md' => 3,
                    'xl' => 3,
                ]),

            SpatieMediaLibraryFileUpload::make('event_reseat')
                ->collection('event_reseats')
                ->multiple()
                ->downloadable()
                ->label('صورة الايصال')
                ->downloadable()
                ->columnSpan([
                    'sm' => 1,
                    'md' => 3,
                    'xl' => 3,
                ]),
            ])
            ->columns([
                'sm' => 1,
                'md' => 1,
                'xl' => 3,
            ])
            ->description('مسؤول عنها لجنة المعارض')
            ->collapsed(),
           
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')
                ->label('التاريخ'),
               
                TextColumn::make('volunteers.name')
                ->label('الاسم')
       
                ->listWithLineBreaks()
                ->limitList(3)
                ->expandableLimitedList(),
                TextColumn::make('volunteers.phone')
                ->label('الرقم')
            
                ->listWithLineBreaks()
                ->limitList(3)
                ->expandableLimitedList(),

                TextColumn::make('type')
                ->label('المشاركة'),

                TextColumn::make('volunteers_count')
                    ->counts('volunteers')
                ->label('العدد'),
                SpatieMediaLibraryImageColumn::make('event_scren')
                ->collection('event_screns')
                ->label('صورة الحدث')
                
                ->toggleable(isToggledHiddenByDefault: true),

                
            ])
            ->filters([
                SelectFilter::make('type')
                ->options([
                    'الاحداث الاوفلاين' => [
                        'معرض مبلابس'  => 'معرض مبلابس',
                        'اجتماع اوفلاين' => 'اجتماع اوفلاين',
                        'قافلة اطعام' => 'قافلة اطعام',
                        'قافلة سوق' => 'قافلة سوق',
                        'حفلة ابطال تحدي' => 'حفلة ابطال تحدي',
                        'كرنفال' => 'كرنفال',
                        'اعمار' => 'اعمار',
                        'اداريات' => 'اداريات',
                    ],
                    'الاحداث الاونلاين' => [
                        'ميديا' => 'ميديا',
                        'اتصالات' => 'اتصالات',
                        'اداريات' => 'اداريات',
                        'اجتماع اون لاين' => 'اجتماع اون لاين',
                    ],
                    'اخر'    => 'اخر',
                ])->label('نوع المشاركة')
                ->placeholder('اختر النوع')
                ->searchable()
                ->multiple(),


                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
               
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
