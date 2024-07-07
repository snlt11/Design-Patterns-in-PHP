<?php

/*
    publisher #attach=subscribe #detach=unsubscribe #notify
    Subscriber #update
 */

abstract class SubscriberObject
{
    abstract function update($tutorial, $subscriber);
}

abstract class publisherObject
{
    abstract function subscribe(SubscriberObject $subscriber);

    abstract function unsubscribe(SubscriberObject $subscriber);

    abstract function notify();
}

class TutorialPublisher extends publisherObject
{
    private string $NewTutorial = "";
    private array $subscribers = [];

    public function subscribe(SubscriberObject $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function unsubscribe(SubscriberObject $subscriber): void
    {
        foreach ($this->subscribers as $key => $value) {
            if ($value === $subscriber) {
                unset($this->subscribers[$key]);
            }
        }
//        $key = array_search($subscriber, $this->subscribers);
//        unset($this->subscribers[$key]);
    }

    public function AddNewTutorial(string $newTutorial): void
    {
        $this->NewTutorial = $newTutorial;
        $this->notify();
    }

    public function notify(): void
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->NewTutorial, $subscriber);
        }
    }

}

class StudentSubscriber extends SubscriberObject
{
    public function update($tutorial, $subscriber): void
    {
        echo $subscriber->name . " has been notified about the new tutorial " . $tutorial . "<br>";
    }
}

$student1 = new StudentSubscriber();
$student1->name = "Student1";
$student2 = new StudentSubscriber();
$student2->name = "Student2";
$student3 = new StudentSubscriber();
$student3->name = "Student3";

$tutorialChannel = new TutorialPublisher();
$tutorialChannel->subscribe($student1);
$tutorialChannel->subscribe($student2);
$tutorialChannel->subscribe($student3);

$tutorialChannel->AddNewTutorial("PHP Tutorial");
echo "<br><hr><br>";
$tutorialChannel->unsubscribe($student2);
$tutorialChannel->AddNewTutorial("Java Tutorial");
