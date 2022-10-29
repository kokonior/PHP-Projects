<?php

declare(strict_types = 1);

final class Todo
{
  private ?string $title;
  private ?bool $isDone;
  private ?string $description;
  private ?DateTimeImmutable $createdAt;
  private ?DateTimeImmutable $completedAt;
  private ?DateTimeImmutable $updatedAt;
  private ?DateTimeImmutable $deletedAt;

  private function __construct()
  {
    $this->isDone = false;
    $this->createdAt = new DateTimeImmutable();
  }

  /**
   * @throws Exception
   */
  public static function create(string $title, ?string $description = null): self
  {
    $self = new self();
    $self->setTitle($title);
    $self->setDescription($description);

    return $self;
  }

  /**
   * @throws Exception
   */
  public function setTitle(string $title): void
  {
    if (strlen($title) < 3) {
      throw new Exception('title of todo must have min. 3 characters');
    }

    $this->title = $title;
  }

  public function setDescription(?string $description): void
  {
    $this->description = $description;
  }

  /**
   * @throws Exception
   */
  public function update(string $title, ?string $description): void
  {
    $this->setTitle($title);
    $this->setDescription($description);
    $this->updatedAt = new DateTimeImmutable();
  }

  public function complete(): void
  {
    $this->isDone = true;
    $this->completedAt = new DateTimeImmutable();
  }

  public function remove(): void
  {
    $this->deletedAt = new DateTimeImmutable();
  }
}

// Demo to use this entity
$newTodo = Todo::create('create a new PR');
$newTodo->update('create a new github PR', 'first hacktoberfest PR');
$newTodo->complete();
$newTodo->remove();

var_dump($newTodo);
