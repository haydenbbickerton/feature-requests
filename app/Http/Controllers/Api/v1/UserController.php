<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use Dingo\Api\Routing\Helpers;

/**
 * User resource representation.
 *
 * @Resource("Users", uri="/users")
 */
class UserController extends Controller
{

    use Helpers;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
        $this->middleware('api.auth');
    }

    /**
     * Get "me"
     *
     * Gets the user associated with the JWT token.
     *
     * @Get("/me")
     * @Versions({"v1"})
     * @Response(200, body={"data": {"id": 1, "first_name": "foo", "last_name": "bar", "display_name": "foo bar",  "email": "foobar@example.com", "picture": "https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s50"}})
     */
    public function me()
    {
        $user = app('Dingo\Api\Auth\Auth')->user();
        
        return $this->response->item($user, new UserTransformer);
    }

    /**
     * Get user
     *
     * Gets the user by id.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"data": {"id": 1, "first_name": "foo", "last_name": "bar", "display_name": "foo bar",  "email": "foobar@example.com", "picture": "https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s50"}})
     */
    public function show($id)
    {
        $user = $this->users->find((int) $id);
        
        return $this->response->item($user, new UserTransformer);
    }
}
