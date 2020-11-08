$('#chat').ready(function () {
  let chat = {}

  chat.requests = 0
  chat.chatEngine = 'chatHandler.php'
  chat.msgBox = $('#message-box')
  chat.entry = $('#chat #entry')
  chat.sendButton = $('#send-message')

  chat.scrollDown = function (force=false) {
    if (force === true || chat.msgBox.height() - chat.msgBox.scrollTop() < 150) {
      chat.msgBox.animate({
        scrollTop: force === true ? 999999 : chat.msgBox.prop("scrollHeight")
      }, 500)
    }
  }

  chat.fetchMessages = function () {
    $.ajax({
      url: chat.chatEngine,
      type: 'POST',
      data: { method: 'fetch' },
      success: function (data) {
        chat.msgBox.html(data)
        chat.scrollDown(force=(chat.requests === 0)) // First request should scroll to the bottom.
        chat.requests += 1
      }
    })
  }

  chat.sendButton.click(function () {
    let value = chat.entry.val()
    if (value !== '') {
      $.ajax({
        url: chat.chatEngine,
        type: 'POST',
        data: {
          method: 'send',
          content: value
        },
        success: function () {
          chat.fetchMessages()
          chat.scrollDown(force=true)
          chat.entry.val('')
        }
      })
    }
  })

  chat.interval = setInterval(chat.fetchMessages, 5000)
  chat.fetchMessages()
})
