<?php

namespace App\Policies;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LivroPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return TRUE;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Livro $livro): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Livro $livro): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Livro $livro): bool
    {
        return FALSE;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Livro $livro): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Livro $livro): bool
    {
        //
    }
}
