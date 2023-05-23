<?php
// Blog post data (can be stored in a database)
$posts = [
    [
        'title' => 'First Blog Post',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'category' => 'General',
        'tags' => ['Lorem', 'ipsum', 'blog'],
        'published' => true
    ],
    [
        'title' => 'Second Blog Post',
        'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'category' => 'Technology',
        'tags' => ['Sed', 'tempor', 'blog'],
        'published' => true
    ],
    // Add more blog posts here
];

function displayBlogPosts($posts)
{
    foreach ($posts as $post) {
        if ($post['published']) {
            echo '<h2>' . $post['title'] . '</h2>';
            echo '<p>' . $post['content'] . '</p>';
            echo '<p>Category: ' . $post['category'] . '</p>';
            echo '<p>Tags: ' . implode(', ', $post['tags']) . '</p>';
            echo '<hr>';
        }
    }
}

function filterByCategory($posts, $category)
{
    $filteredPosts = [];
    foreach ($posts as $post) {
        if ($post['category'] === $category && $post['published']) {
            $filteredPosts[] = $post;
        }
    }
    return $filteredPosts;
}

function filterByTag($posts, $tag)
{
    $filteredPosts = [];
    foreach ($posts as $post) {
        if (in_array($tag, $post['tags']) && $post['published']) {
            $filteredPosts[] = $post;
        }
    }
    return $filteredPosts;
}

displayBlogPosts($posts);

$filteredPosts = filterByCategory($posts, 'Technology');
displayBlogPosts($filteredPosts);

$filteredPosts = filterByTag($posts, 'Lorem');
displayBlogPosts($filteredPosts);
?>
