<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;

class Joke
{
    private $authorsTable;
    private $jokesTable;
    public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable)
    {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    }

    public function home()
    {
        $title = 'Internet Joke Database';
        return ['template' => 'home.html.php', 'title' => $title];
    }
    public function list()
    {
        $result = $this->jokesTable->findAll();
        $jokes = [];
        foreach ($result as $joke) {
            $author =
                $this->authorsTable->findById($joke['authorid']);
            $jokes[] = [
                'id' => $joke['id'],
                'joketext' => $joke['joketext'],
                'jokedate' => $joke['jokedate'],
                'name' => $author['name'],
                'email' => $author['email']
            ];
        }
        $title = 'Joke list';
        $totalJokes = $this->jokesTable->total();
        return [
            'template' => 'jokes.html.php',
            'title' => $title,
            'variables' => [
                'totalJokes' => $totalJokes,
                'jokes' => $jokes
            ]
        ];
    }
    public function saveEdit()
    {
        $joke['joketext'] = $_POST['joketext'];
        $joke['jokedate'] = new \DateTime();
        $joke['id'] = $_POST['jokeid'];
        $joke['authorid'] = 1;
        $this->jokesTable->save($joke);
        header('location: /joke/list');
    }
    public function edit()
    {
        if (isset($_GET['id'])) {
            $joke = $this->jokesTable->findById($_GET['id']);
        }
        $title = 'Edit joke';
        return [
            'template' => 'editjoke.html.php',
            'title' => $title,
            'variables' => ['joke' => $joke ?? null]
        ];
    }
    public function delete()
    {
        $this->jokesTable->delete($_POST['id']);
        header('location: /joke/list');
    }
}
