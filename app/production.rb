ssh_options[:port] = 22
set :application, "totem"
set :domain,      "internetpsykiatrien.com"
set :deploy_to,   "/var/www/production_totem"
set :user, "deployer"

#ubuntu server jest www-data, redhaty i fedory to apache
set :webserver_user,    "www-data"

server "internetpsykiatrien.com", :app, :web, :db, :primary => true

set  :use_sudo,      false
set :permission_method,   :acl
set :use_set_permissions, true
set :keep_releases,  3

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL