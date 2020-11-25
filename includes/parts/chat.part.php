<script src="scripts/chat.js"></script>
<div id="chat">
  <div class="header">
    <span class="title">Chat</span>
  </div>
  <div id="message-box">
  </div>
  <?php if (is_authenticated() === true) { ?>
  <div class="your-message">
    <form id="message-form" action="javascript:void(0)">
      <input id="entry" type="text" name="message" autocomplete="off" placeholder="Twój komentarz...">
      <button id="send-message"> > </button>
    </form>
  </div>
  <?php } else { ?>
  <div class="your-message">
    <span>Zaloguj się, aby móc uczestniczyć w rozmowie</span>
  </div>
  <?php } ?>
</div>