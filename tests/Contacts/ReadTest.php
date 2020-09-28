<?php


namespace Tests\Contacts;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class ReadTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @var Collection|Model|User
     */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $contacts = Contact
            ::factory()
            ->count(30)
            ->make();

        $this->user->contacts()->saveMany($contacts);
    }


    public function testNormalList()
    {
        $this->actingAs($this->user)->get('/contacts');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'phone',
                    'email'
                ]
            ],
        ]);
    }
}
