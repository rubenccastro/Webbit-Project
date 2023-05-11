<?php
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$postId = $_POST['postId'];
$userId = $_SESSION["userid"];
if (isset($_SESSION["userid"])) {

    $existingVote = $queryBuilder->selectOne('karmapoints', 'users_id', $userId, 'posts_id', $postId);

    if (!$existingVote) {
        $post = $queryBuilder->findById('posts', $postId);
        $newKarmaPoints = $post->karmapoints;
        $voteValue = 0;

        if ($_POST['voteValue'] == 'up') {
            $newKarmaPoints += 1;
            $voteValue = 1;
        } elseif ($_POST['voteValue'] == 'down') {
            $newKarmaPoints -= 1;
            $voteValue = -1;
        }
        $currentVoteState = $_POST['voteValue'];
        $votes = [
            'karmapoints' => $newKarmaPoints
        ];
        $votestate = [
            'votestate' => $currentVoteState
        ];
        $post = $queryBuilder->update('posts', $postId, $votes);

        $queryBuilder->create('karmapoints', [
            'users_id' => $userId,
            'posts_id' => $postId,
            'vote_value' => $voteValue,
            'votestate' => $currentVoteState
        ]);
    } else {
        $previousVoteValue = $existingVote->vote_value;

        $post = $queryBuilder->findById('posts', $postId);
        $currentKarmaPoints = $post->karmapoints;
        $voteValue = 0;

        if ($_POST['voteValue'] == 'up') {
            $voteValue = ($previousVoteValue == 1) ? 0 : 1;
        } elseif ($_POST['voteValue'] == 'down') {
            $voteValue = ($previousVoteValue == -1) ? 0 : -1;
        }
        $currentKarmaPoints += $voteValue - $previousVoteValue;
        $currentVoteState = $_POST['voteValue'];
        $votes = [
            'karmapoints' => $currentKarmaPoints
        ];
        $votestate = [
            'votestate' => $currentVoteState
        ];
        $post = $queryBuilder->update('posts', $postId, $votes);

        if ($voteValue == 0) {
            $queryBuilder->delete('karmapoints', 'users_id', $userId, 'posts_id', $postId);
        } else {
            $queryBuilder->updateWithCompositeKey('karmapoints', 'users_id', $userId, 'posts_id', $postId, ['vote_value' => $voteValue], ['votestate' => $currentVoteState]);
        }
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($votes);
}