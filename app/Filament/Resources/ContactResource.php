<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationIcon = 'heroicon-o-mail';
    protected static ?string $navigationLabel = 'Contact Messages';
    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralModelLabel = 'Contact Messages';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->disabled()->label('Name'),
            TextInput::make('email')->disabled()->label('Email'),
            TextInput::make('subject')->disabled()->label('Subject')->columnSpanFull(),
            Textarea::make('message')->disabled()->label('Message')->rows(6)->columnSpanFull(),
            TextInput::make('ip_address')->disabled()->label('IP Address'),
            TextInput::make('created_at')->disabled()->label('Received At')
                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('F j, Y \a\t g:i A') : '—'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->label('Name'),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('subject')->label('Subject')->default('—')
                    ->limit(40)->tooltip(fn ($record) => $record->subject),
                TextColumn::make('message')->label('Preview')->limit(60)
                    ->tooltip(fn ($record) => $record->message),
                TextColumn::make('created_at')->label('Received')->dateTime('d M Y, H:i')->sortable(),
            ])
            ->filters([
                Filter::make('has_subject')
                    ->label('Has Subject')
                    ->query(fn (Builder $query) => $query->whereNotNull('subject')),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view'  => Pages\ViewContact::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
