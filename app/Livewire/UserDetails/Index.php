<?php

namespace App\Livewire\UserDetails;

use App\Livewire\Trait\CommonTraitNew;
use App\Models\UserDetails;
use Livewire\Component;

class Index extends Component
{
    use CommonTraitNew;

    #region[Properties]
    public $bio;
    public $role;

    #endregion

    #region[getSave]
    public function getSave(): void
    {
        if ($this->common->vid == '') {
            $UserDetails = new UserDetails();
            $extraFields = [
                'bio' => $this->bio,
                'role' => $this->role,
                'user_id' => auth()->id(),
            ];
            $this->common->save($UserDetails, $extraFields);
            $this->clearFields();
            $message = "Saved";
        } else {
            $UserDetails = UserDetails::find($this->common->vid);
            $extraFields = [
                'bio' => $this->bio,
                'role' => $this->role,
                'user_id' => auth()->id(),
            ];
            $this->common->edit($UserDetails, $extraFields);
            $this->clearFields();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $UserDetails = UserDetails::find($id);
            $this->common->vid = $UserDetails->id;
            $this->common->vname = $UserDetails->vname;
            $this->bio = $UserDetails->bio;
            $this->role = $UserDetails->role;
            $this->common->active_id = $UserDetails->active_id;
            return $UserDetails;
        }
        return null;
    }

    #endregion

    #region[Clear Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->bio = '';
        $this->role = '';
        $this->common->active_id = '1';
    }

    #endregion

    public function render()
    {
        return view('livewire.user-details.index')->with([
            'list' => $this->getListForm->getList(UserDetails::class),
        ]);
    }
}
