<?php
$directory = './assets/images/carrousel';
$images = glob($directory . '/*.{jpg,png,gif}', GLOB_BRACE);

echo '<div class="img-container">';
foreach ($images as $index => $image) {
    echo '<img class="carrousel-img" src="' . $image . '" />';
}
?>
    <div class="arrows">
        <svg class="prev" viewBox="0 0 256 512" width="100" title="angle-left">  
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" />
        </svg>
        <svg class="next" viewBox="0 0 256 512" width="100" title="angle-right">
            <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
        </svg>
    </div>
<?php
echo '</div>';
?>