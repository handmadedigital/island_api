<?php namespace ThreeAccents\Users\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Users\Entities\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'username' => $user->username,
            'slug' => $user->slug,
            'is_admin' => (bool) $user->is_admin,
        ];
    }
}