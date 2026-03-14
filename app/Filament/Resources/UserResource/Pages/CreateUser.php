<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Create New User';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Details')
                    ->description('Add new user information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name'),
                        
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('Enter email address'),
                        
                        Forms\Components\Select::make('role')
                            ->options([
                                'admin' => 'Admin',
                                'editor' => 'Editor',
                                'user' => 'User',
                            ])
                            ->default('user')
                            ->required()
                            ->native(false)
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->rule(Password::default())
                            ->same('passwordConfirmation')
                            ->maxLength(255)
                            ->placeholder('Enter password')
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)),
                        
                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->password()
                            ->label('Confirm Password')
                            ->required()
                            ->dehydrated(false)
                            ->placeholder('Confirm password'),
                        
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->nullable()
                            ->helperText('Leave empty if email is not verified'),
                    ])
                    ->columns(2),
            ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'User created successfully';
    }
}