<?php

namespace App\Http\Livewire\Admin;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Feedbacks extends Component
{
  use WithPagination;

  public $per_page = 25;
  public $comment_id;
  public $comment;

  protected $listeners = ['confirmDelete' => 'commentDeleted' ];


  public function deleteDialog($id)
  {
    $this->comment_id = $id;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function commentDeleted()
  {

    $comment = Report::where('id', $this->comment_id)->first();
    $comment->delete();
    $this->dispatchBrowserEvent('itemDeleted');
  }

  public function viewComment($id)
  {
    $comment = Report::where('id', $id)->first();
    $this->comment = $comment->comment;

    $this->dispatchBrowserEvent('show-comment-info');
  }

  public function render()
  {
    $comments = Report::paginate($this->per_page);
    return view('livewire.admin.feedbacks', [
      'comments' => $comments,
    ]);
  }
}
