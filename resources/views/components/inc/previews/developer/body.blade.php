<div class="preview-user__body">
    <div class="preview-user__body-content-list">
        <span class="preview-user__body-content-title">
            About the designer:
        </span>
        <div class="preview-user__body-list-item">
            <p>Rating:</p>
            <div class="preview-user__body-list-item-dots"></div>
            <x-inc.previews.rating :ratingStars="$ratingStars" :ratingCount="$ratingCount" />
        </div>
        <div class="preview-user__body-list-item">
            <p>Price:</p>
            <div class="preview-user__body-list-item-dots"></div>
            <span>{{ $price }}</span>
        </div>
        
    </div>
</div>
