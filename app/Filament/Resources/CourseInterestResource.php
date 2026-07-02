<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseInterestResource\Pages;
use App\Models\CourseInterest;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class CourseInterestResource extends Resource
{
    protected static ?string $model = CourseInterest::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Course Interest';
    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralModelLabel = 'Course Interests';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('course')
                ->options([
                    'basic_korean' => 'Basic Korean Learning',
                    'topik_ii'     => 'TOPIK II Preparation',
                ])
                ->required()
                ->disabled(),
            TextInput::make('full_name')->required()->label('Full Name')->disabled(),
            TextInput::make('email')->email()->required()->disabled(),
            TextInput::make('phone')->nullable()->disabled(),
            Select::make('current_status')
                ->options([
                    'du_student'    => 'DU Student',
                    'other_student' => 'Other Student',
                    'working'       => 'Working Professional',
                    'other'         => 'Other',
                ])
                ->required()
                ->disabled()
                ->label('Current Status'),
            TextInput::make('department')->nullable()->disabled(),
            TextInput::make('year_of_study')->nullable()->label('Year of Study')->disabled(),
            Select::make('korean_level')
                ->options([
                    'none'         => 'No Korean',
                    'beginner'     => 'Beginner',
                    'intermediate' => 'Intermediate',
                ])
                ->disabled()
                ->label('Korean Level'),
            Textarea::make('why_interested')->nullable()->label('Why Interested')->disabled()->columnSpanFull(),
            TextInput::make('ip_address')->nullable()->disabled()->label('IP Address'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('course')
                    ->enum([
                        'basic_korean' => 'Basic Korean',
                        'topik_ii'     => 'TOPIK II',
                    ])
                    ->colors([
                        'success' => 'basic_korean',
                        'warning' => 'topik_ii',
                    ]),
                TextColumn::make('full_name')->label('Name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('phone')->toggleable(isToggledHiddenByDefault: true),
                BadgeColumn::make('current_status')
                    ->enum([
                        'du_student'    => 'DU Student',
                        'other_student' => 'Other Student',
                        'working'       => 'Working',
                        'other'         => 'Other',
                    ])
                    ->colors([
                        'primary' => 'du_student',
                        'secondary' => 'other_student',
                        'success'  => 'working',
                        'warning'  => 'other',
                    ])
                    ->label('Status'),
                BadgeColumn::make('korean_level')
                    ->enum([
                        'none'         => 'No Korean',
                        'beginner'     => 'Beginner',
                        'intermediate' => 'Intermediate',
                    ])
                    ->colors([
                        'secondary' => 'none',
                        'primary'   => 'beginner',
                        'success'   => 'intermediate',
                    ])
                    ->label('Level'),
                TextColumn::make('created_at')->label('Submitted')->dateTime('d M Y, H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('course')->options([
                    'basic_korean' => 'Basic Korean Learning',
                    'topik_ii'     => 'TOPIK II Preparation',
                ]),
                SelectFilter::make('current_status')->options([
                    'du_student'    => 'DU Student',
                    'other_student' => 'Other Student',
                    'working'       => 'Working Professional',
                    'other'         => 'Other',
                ]),
                SelectFilter::make('korean_level')->options([
                    'none'         => 'No Korean',
                    'beginner'     => 'Beginner',
                    'intermediate' => 'Intermediate',
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseInterests::route('/'),
            'view'  => Pages\ViewCourseInterest::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
