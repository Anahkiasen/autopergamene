window.Glow = {}

# URL -------------------------------------------------------------- /

###
The URL library is responsible for
generating URLs to framework routes.
###
class Glow.URL

  # Attributes
  @base  : "%BASE%"
  @asset : "%ASSET%"

  ###
  Retrieve the URL to a route.
  @param  String  uri
  @param  Boolean https
  @return String
  ###
  @to: (uri, https = false) ->
    url = @base + "/" + uri
    url.replace "http://", "https://" if https

    return url

  ###
  Retrieve the URL to an asset
  ###
  @to_asset: (uri, https = false) ->
    url = @asset + "/" + uri
    url.replace "http://", "https://" if https

    return url

  ###
  Retrieve the URL to an action
  ###
  @to_action: (action, parameters = {}) ->

    # Get controller and action
    [controller, action] = action.split('@')
    controller = controller.replace('.', '/')
    url = "#{controller}/#{action}"

    # Append parameters
    for key, parameter of parameters
      url += '/' + parameter

    return @to url

  ###
  Retrieve the secure URL to a route.
  ###
  @to_secure: (uri) ->
    return @to uri, true
