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
    public $editingCampaignId = null;
    public $isEditing = false;
    public $currentImage = null;

    // Campaign form fields
    public $image, $title, $category_id, $target_amount, $end_date, $target_penerima_manfaat, $lokasi_penyaluran, $description;

    protected function rules()
    {
        return [
            'image' => $this->isEditing ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'target_amount' => 'required|numeric|min:1',
            'end_date' => 'required|date|after:today',
            'target_penerima_manfaat' => 'required|string|max:255',
            'lokasi_penyaluran' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
        if (!$this->showCreateForm) {
            $this->cancelEdit();
        }
    }

    public function editCampaign($campaignId)
    {
        $campaign = Campaign::where('id', $campaignId)
            ->where('fundraiser_id', $this->fundraiser->id)
            ->where('status', 'draft')
            ->first();
        
        if ($campaign) {
            $this->editingCampaignId = $campaign->id;
            $this->isEditing = true;
            $this->showCreateForm = true;
            $this->currentImage = $campaign->image;
            
            $this->title = $campaign->title;
            $this->category_id = $campaign->category_id;
            $this->target_amount = $campaign->target_amount;
            $this->end_date = $campaign->end_date;
            $this->target_penerima_manfaat = $campaign->target_penerima_manfaat;
            $this->lokasi_penyaluran = $campaign->lokasi_penyaluran;
            $this->description = $campaign->description;
        }
    }

    public function updateCampaign()
    {
        $this->validate();
        
        $campaign = Campaign::find($this->editingCampaignId);
        
        // Only update image if a new one is uploaded
        if ($this->image) {
            $imagePath = $this->image->store('campaigns', 'public');
            $campaign->image = basename($imagePath);
        }
        
        // Only regenerate slug if title has changed
        if ($campaign->title !== $this->title) {
            $campaign->slug = Str::slug($this->title) . '-' . time();
        }
        
        $campaign->title = $this->title;
        $campaign->category_id = $this->category_id;
        $campaign->target_amount = $this->target_amount;
        $campaign->end_date = $this->end_date;
        $campaign->target_penerima_manfaat = $this->target_penerima_manfaat;
        $campaign->lokasi_penyaluran = $this->lokasi_penyaluran;
        $campaign->description = $this->description;
        $campaign->save();
        
        $this->reset(['image', 'title', 'category_id', 'target_amount', 'end_date', 'target_penerima_manfaat', 'lokasi_penyaluran', 'description', 'showCreateForm', 'isEditing', 'editingCampaignId', 'currentImage']);
        session()->flash('success', 'Campaign berhasil diperbarui.');
    }

    public function cancelEdit()
    {
        $this->reset(['image', 'title', 'category_id', 'target_amount', 'end_date', 'target_penerima_manfaat', 'lokasi_penyaluran', 'description', 'isEditing', 'editingCampaignId', 'currentImage']);
    }

    public function saveCampaign()
    {
        if ($this->isEditing) {
            $this->updateCampaign();
        } else {
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
                'status' => 'draft',
                'fundraiser_id' => $this->fundraiser->id,
                'start_date' => now(),
                'slug' => Str::slug($this->title) . '-' . time(),
            ]);

            $this->reset(['image', 'title', 'category_id', 'target_amount', 'end_date', 'target_penerima_manfaat', 'lokasi_penyaluran', 'description', 'showCreateForm']);
            session()->flash('success', 'Campaign berhasil diajukan dan sedang menunggu persetujuan.');
        }
        
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $this->user = Auth::user();
        $this->fundraiser = Fundraiser::where('user_id', $this->user->id)->first();
        
        if ($this->fundraiser) {
            $this->campaigns = Campaign::where('fundraiser_id', $this->fundraiser->id)->latest()->get();
            
            // Get settlement amounts from transactions
            $settlementAmounts = \App\Models\Transaction::getSettlementAmount();
            
            // Map settlement amounts to campaigns
            foreach ($this->campaigns as $campaign) {
                $settlement = $settlementAmounts->firstWhere('campaign_id', $campaign->id);
                $campaign->collected_amount = $settlement ? $settlement->total_gross_amount : 0;
            }
        } else {
            $this->campaigns = collect();
        }

        return view('livewire.dashboard-fundraiser-main', [
            'categories' => Category::all()
        ]);
    }
}
