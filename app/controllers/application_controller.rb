class ApplicationController < ActionController::Base
  # Prevent CSRF attacks by raising an exception.
  # For APIs, you may want to use :null_session instead.
  protect_from_forgery with: :exception

def check_motion
cmd = "ssh 127.0.0.1 -p2222 'ps -ef |grep motion|grep -v grep'"
res = `#{cmd}`

end


end
