<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage as MessagesMailMessage;

class MailMessage extends MessagesMailMessage
{

    protected array $panelLines = [];

    protected string $lang = '';

    /**
     * Add a line to be displayed in panel
     *
     * @param  string $line
     *
     * @return self
     */
    public function panelLine(string $line)
    {
        $this->panelLines[] = $line;
        return $this;
    }

    public function lang(string $lang)
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * Add array lines to be displayed in panel
     *
     * @param  array <string>$line
     *
     * @return self
     */
    public function panelLines(array $lines)
    {
        foreach ($lines as $line) {
            $this->panelLines[] = $line;
        }
        return $this;
    }


    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'level' => $this->level,
            'subject' => $this->subject,
            'greeting' => $this->greeting,
            'salutation' => $this->salutation,
            'introLines' => $this->introLines,
            'outroLines' => $this->outroLines,
            'actionText' => $this->actionText,
            'actionUrl' => $this->actionUrl,
            'panelLines' => $this->panelLines,
            'lang' => $this->lang,
            'displayableActionUrl' => str_replace(['mailto:', 'tel:'], '', $this->actionUrl ?? ''),
        ];
    }
}
