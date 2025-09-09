
namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function lectureNotes ()
    {
        $data = [
            'title' => 'Lecture Notes',
            'heading' => 'Welcome to Codelgniter 4',
            'message' => 'This is your first custom page in Codelgniter 4'
       ];
        return view('lecture_notes', $data);
    }
}
