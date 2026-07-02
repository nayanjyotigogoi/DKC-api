<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberApplicationResource\Pages;
use App\Models\MemberApplication;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class MemberApplicationResource extends Resource
{
    protected static ?string $model = MemberApplication::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-add';
    protected static ?string $navigationLabel = 'Applications';
    protected static ?string $navigationGroup = 'Members';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('full_name')->required()->label('Full Name'),
            TextInput::make('email')->email()->required(),
            TextInput::make('phone')->nullable(),
            Select::make('current_status')->options([
                'du_student'    => 'Student at Dibrugarh University',
                'other_student' => 'Student at Another Institution',
                'working'       => 'Working Professional',
                'other'         => 'Other',
            ])->required()->label('Current Status'),
            TextInput::make('institution')->nullable()->label('Institution (if other university)'),
            TextInput::make('occupation')->nullable()->label('Occupation / Job Title'),
            TextInput::make('organization')->nullable()->label('Company / Organisation'),
            TextInput::make('department')->nullable(),
            TextInput::make('course')->nullable(),
            TextInput::make('year_of_study')->nullable()->label('Year of Study'),
            TextInput::make('favourite_korean_thing')->nullable()->label('Favourite Korean Thing'),
            Select::make('how_heard')->options([
                'social_media'  => 'Social Media',
                'friend'        => 'Friend / Word of Mouth',
                'notice_board'  => 'Notice Board',
                'event'         => 'Attended an Event',
                'other'         => 'Other',
            ])->required()->label('How Did They Hear'),
            TextInput::make('how_heard_other')->nullable()->label('Other (specify)'),
            Textarea::make('why_join')->required()->label('Why They Want to Join')->columnSpanFull(),
            Select::make('status')->options([
                'pending'  => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
            ])->default('pending')->required(),
            Textarea::make('admin_notes')->nullable()->label('Admin Notes')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->searchable()->sortable()->label('Name'),
                TextColumn::make('email')->searchable(),
                BadgeColumn::make('current_status')->label('Status')->colors([
                    'primary' => 'du_student',
                    'warning' => 'other_student',
                    'success' => 'working',
                    'secondary' => 'other',
                ])->enum([
                    'du_student'    => 'DU Student',
                    'other_student' => 'Other Student',
                    'working'       => 'Working',
                    'other'         => 'Other',
                ]),
                TextColumn::make('department')->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger'  => 'rejected',
                    ]),
                TextColumn::make('created_at')->dateTime('M j, Y')->sortable()->label('Applied On'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options([
                    'pending'  => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMemberApplications::route('/'),
            'create' => Pages\CreateMemberApplication::route('/create'),
            'edit'   => Pages\EditMemberApplication::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->isAdmin() ?? false; }
    public static function canCreate(): bool  { return false; } // only via public form
    public static function canEdit($record): bool   { return auth()->user()?->isAdmin() ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->isSuperAdmin() ?? false; }
}
