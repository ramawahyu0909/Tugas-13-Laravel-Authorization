<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function delete(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }
}
