<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * QUE PODEM VISUALIZAR OS REGISTROS
     */
    public function viewAny(User $user): bool
    {
        if ($user->user_level === 'administrator' || $user->user_level === 'financial' || $user->user_level === 'financial_2' || $user->user_level === 'moderator') {
            return true;
        }

        return false;
    }
    /**
     * QUEM PODE CRIAR UM REGISTRO
     */
    public function create(User $user): bool
    {
        if ($user->user_level === 'administrator' || $user->user_level === 'financial' || $user->user_level === 'financial_2') {
            return true;
        }

        return false;
    }

    /**
     * QUEM PODE ATUALIZAR UM REGISTRO
     */
    public function update(User $user): bool
    {
        if ($user->user_level === 'administrator' || $user->user_level === 'financial' || $user->user_level === 'financial_2') {
            return true;
        }

        return false;
    }

    /**
     * QUEM PODE EXCLUIR UM REGISTRO
     */
    public function delete(User $user): bool
    {
        if ($user->user_level === 'administrator' || $user->user_level === 'financial') {
            return true;
        }

        return false;
    }
}
