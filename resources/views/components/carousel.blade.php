<section class="bg-white h-full py-8 bg-gray-100">
    <div class="mx-auto flex gap-1 overflow-hidden">
        <div class="marquee flex gap-1 mt-4">
            @foreach([
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 1', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 1', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou2.jpg', 'alt' => 'Image 2', 'height' => 'h-45'],
                ],
                [
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 3', 'height' => 'h-30'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 4', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou5.jpg', 'alt' => 'Image 5', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 6', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou7.jpg', 'alt' => 'Image 7', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou8.jpg', 'alt' => 'Image 8', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou9.jpg', 'alt' => 'Image 9', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 10', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 11', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 12', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 13', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 14', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou2.jpg', 'alt' => 'Image 15', 'height' => 'h-20'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 16', 'height' => 'h-48'],
                    ['src' => 'storage/img/carou7.jpg', 'alt' => 'Image 17', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou3.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou5.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou3.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                ],
            ] as $group)
                <div class="w-45">
                    @foreach($group as $image)
                        <div class="bg-white rounded-lg inset-shadow-sm shadow-l m-1 border-1 border-gray-200 overflow-hidden p-2">
                            <img src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }}" class="w-full {{ $image['height'] }} object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
            @endforeach
            <!-- Duplicate groups for seamless marquee effect -->
            @foreach([
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 1', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 1', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou2.jpg', 'alt' => 'Image 2', 'height' => 'h-45'],
                ],
                [
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 3', 'height' => 'h-30'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 4', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou5.jpg', 'alt' => 'Image 5', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 6', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou7.jpg', 'alt' => 'Image 7', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou8.jpg', 'alt' => 'Image 8', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou9.jpg', 'alt' => 'Image 9', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 10', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 11', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 12', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 13', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 14', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou2.jpg', 'alt' => 'Image 15', 'height' => 'h-20'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 16', 'height' => 'h-48'],
                    ['src' => 'storage/img/carou7.jpg', 'alt' => 'Image 17', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou10.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou3.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou5.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou6.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou12.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                    ['src' => 'storage/img/carou3.jpg', 'alt' => 'Image 18', 'height' => 'h-25'],
                ],
                [
                    ['src' => 'storage/img/carou11.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                    ['src' => 'storage/img/carou4.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                    ['src' => 'storage/img/carou1.jpg', 'alt' => 'Image 18', 'height' => 'h-40'],
                ],
            ] as $group)
                <div class="w-45">
                    @foreach($group as $image)
                        <div class="bg-white rounded-lg inset-shadow-sm shadow-l m-1 border-1 border-gray-200 overflow-hidden p-2">
                            <img src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }}" class="w-full {{ $image['height'] }} object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>