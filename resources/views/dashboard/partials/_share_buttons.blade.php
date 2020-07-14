 <ul style="padding: 0" id="rrssb-buttons-{{ $post->id }}" class="rrssb-buttons blog__post--social mt-2 list-unstyled d-flex justify-content-center flex-wrap">
    <li class=" d-inline-block">
      <a href="https://www.facebook.com/sharer/sharer.php?u=http://blog.wakeb.tech/posts/{{ $post->slug }}" class="popup">
        <i class="fab fa-facebook-f fa-lg"></i>
      </a>
    </li>
    <li class=" d-inline-block">
      <a href="https://twitter.com/intent/tweet?text=http://blog.wakeb.tech/posts/{{ $post->slug }}" class="popup">
        <i class="fab fa-twitter fa-lg"></i>
      </a>
    </li>
    
    <li class=" d-inline-block">
      <a href="mailto:?Subject=mohamedfullstack@gmail.com">
        <i class="fas fa-envelope fa-lg"></i>
      </a>
    </li>
    
    <li class="d-inline-block ">
    <a href="https://web.whatsapp.com/send?text=http://blog.wakeb.tech/posts/{{ $post->slug }}" data-action="share/whatsapp/share">
      <i class="fab fa-whatsapp fa-lg"></i>
    </a>
  </li>
   

  </ul>


<script>
  var settings = {
    // required:
    title: '{{ lang() == 'ar' ? $post->title_ar : $post->title_en }}',
    url:   '{{ url('posts/'.$post->slug) }}',
    // optional:
    description:  '{{lang() == 'ar' ? $post->body_ar : $post->body_en}}',
    emailBody:  'Usually email body is just the description + url, but you can customize it if you want'
  }
  $('#rrssb-buttons-{{ $post->id }}').rrssb(settings);
</script>
