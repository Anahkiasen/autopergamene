
# Redirection alias ------------------------------------------------ /

redirect = (link) -> window.location = link

# Basic AJAX action ------------------------------------------------ /

action = (link, event, callback) ->
  event.preventDefault()
  method = link.data 'method' or 'GET'

  $.ajax
    type: method
    url : link.attr 'href'
  .done (result) ->

    # Parse JSON if it isn't already
    if Object.prototype.toString.call(result) != '[object Object]'
      result = JSON.parse(result)

    # Display any message in the results --------------------------- /

    if result.message

      # Format the message if it isn't already
      if result.message.search('alert-') is -1
        alert = if result.state then 'success' else 'error'
        result.message = '<div class="alert alert-'+alert+'">' +result.message+ '</div>'

      # Prepend to main form/table
      $('#content form, #content table').prepend result.message

    else console.log result

    # Execute the user's callback ---------------------------------- /

    if callback then callback result

# HTTP verbs handling ---------------------------------------------- /

$('a[data-method]').click (event) -> action $(this), event