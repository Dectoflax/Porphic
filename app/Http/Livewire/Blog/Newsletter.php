<?php

namespace App\Http\Livewire\Blog;

use App\Binkap\Blog\Newsletter\Preferences;
use App\Models\Newsletter as ModelsNewsletter;
use Livewire\Component;

use function Binkap\Laraflash\alert;

class Newsletter extends Component
{
    public string $email;

    public function subscribe()
    {
        $this->validate();
        ModelsNewsletter::create([
            'email' => $this->getPropertyValue('email'),
            'preference' => Preferences::EVERY_THING,
            'active' => true
        ]);
        alert(message: 'You have successfully subscribed')->simple()->livewire($this);
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:newsletters,email']
        ];
    }

    protected function messages()
    {
        return [
            'unique' => 'email already subscribed'
        ];
    }

    public function render()
    {
        return view('livewire.blog.newsletter');
    }
}
