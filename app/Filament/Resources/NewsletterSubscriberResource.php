<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Models\NewsletterSubscriber;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class NewsletterSubscriberResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;
    protected static ?string $navigationIcon = 'heroicon-o-mail-open';
    protected static ?string $navigationLabel = 'Newsletter';
    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralModelLabel = 'Newsletter Subscribers';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->searchable()->sortable(),
                BadgeColumn::make('is_active')
                    ->label('Status')
                    ->enum([true => 'Active', false => 'Unsubscribed'])
                    ->colors(['success' => true, 'danger' => false]),
                TextColumn::make('ip_address')->label('IP')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->label('Subscribed')->dateTime('d M Y, H:i')->sortable(),
            ])
            ->filters([
                Filter::make('active')
                    ->label('Active only')
                    ->query(fn (Builder $q) => $q->where('is_active', true)),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletterSubscribers::route('/'),
        ];
    }

    public static function canCreate(): bool { return false; }
}
