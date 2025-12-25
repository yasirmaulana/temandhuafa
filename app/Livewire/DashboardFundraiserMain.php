<?php

namespace App\Livewire;

use Auth;
use App\Models\Campaign;
use App\Models\Fundraiser;
use Livewire\Component;

use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboardFundraiserMain extends Component
{
    use WithFileUploads;

    public $user, $campaigns, $fundraiser;
    public $showCreateForm = false;

    // Campaign form fields
    public $image, $title, $category_id, $target_amount, $end_date, $target_penerima_manfaat, $lokasi_penyaluran, $description;

    protected $rules = [
        'image' => 'required|image|max:2048',
        'title' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'target_amount' => 'required|numeric|min:1',
        'end_date' => 'required|date|after:today',
        'target_penerima_manfaat' => 'required|string|max:255',
        'lokasi_penyaluran' => 'required|string|max:255',
        'description' => 'required|string',
    ];

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    public function saveCampaign()
    {
        $this->validate();

        $imagePath = $this->image->store('campaigns', 'public');
        $imageName = basename($imagePath);

        Campaign::create([
            'image' => $imageName,
            'title' => $this->title,
            'category_id' => $this->category_id,
            'target_amount' => $this->target_amount,
            'end_date' => $this->end_date,
            'target_penerima_manfaat' => $this->target_penerima_manfaat,
            'lokasi_penyaluran' => $this->lokasi_penyaluran,
            'description' => $this->description,
            'status' => 'draft', // Matches user request for 'pending' style status, but 'draft' is used for admin review usually
            'fundraiser_id' => $this->fundraiser->id,
            'start_date' => now(),
            'slug' => Str::slug($this->title) . '-' . time(),
        ]);

        $this->reset(['image', 'title', 'category_id', 'target_amount', 'end_date', 'target_penerima_manfaat', 'lokasi_penyaluran', 'description', 'showCreateForm']);
        session()->flash('success', 'Campaign berhasil diajukan dan sedang menunggu persetujuan.');
        
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $this->user = Auth::user();
        $this->fundraiser = Fundraiser::where('user_id', $this->user->id)->first();
        
        if ($this->fundraiser) {
            $this->campaigns = Campaign::where('fundraiser_id', $this->fundraiser->id)->latest()->get();
        } else {
            $this->campaigns = collect();
        }

        return view('livewire.dashboard-fundraiser-main', [
            'categories' => Category::all()
        ]);
    }
}
