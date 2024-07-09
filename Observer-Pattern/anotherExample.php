<?php

interface Subscribers
{
    public function update($videoTitle);
}

interface YouTube
{
    public function subscribe(Subscribers $subscriber);

    public function unsubscribe(Subscribers $subscribers);

    public function notify();
}

class Channel implements YouTube
{
    private array $subscribers = [];
    private string $newTutorial = "";

    public function subscribe(Subscribers $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function unsubscribe(Subscribers $subscribers): void
    {
        foreach ($this->subscribers as $key => $value) {
            if ($value === $subscribers) {
                unset($this->subscribers[$key]);
                echo "Subscriber unsubscribed.<br>";
            }
        }
    }

    public function uploadNewVideo($videoTitle): void
    {
        $this->newTutorial = $videoTitle;
        $this->notify();
    }

    public function notify(): void
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->newTutorial);
        }
    }

}

class User implements Subscribers
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update($videoTitle): void
    {
        echo "Hey $this->name, a new video titled '$videoTitle' has been uploaded!.<br>";
    }
}

$channel = new Channel();
$user1 = new User("John Doe");
$user2 = new User("Jane Smith");
$channel->subscribe($user1);
$channel->uploadNewVideo("PHP Tutorial");
$channel->unsubscribe($user1);
$channel->uploadNewVideo("Java Tutorial");
$channel->subscribe($user2);
$channel->uploadNewVideo("Python Tutorial");
$channel->unsubscribe($user2);