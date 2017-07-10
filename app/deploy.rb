set :stages,        %w(staging production)
set :default_stage, "staging"
set :stage_dir,     "app"

default_run_options[:pty] = true
set :scm,         :git
#set :repository,  "git@github.com:declan-lynch/totem_depression_project.git"
set :repository, "."
set :branch, "deployment_fixes"
set :deploy_via, :copy  

after "deploy", "deploy:cleanup"
 
#links the config 
task :link_config do
  run "rm -f #{release_path}/app/config.ini"  
  run "ln -s #{shared_path}/app/config.ini #{release_path}/app/config.ini"  
end 

task :upload_config do
  origin_file = "app/config.ini"
  shared_file = "#{shared_path}/config.ini"
  
  if origin_file && File.exists?(origin_file)
    ext = File.extname(parameters_file)
    relative_path = "app/" + ext

    if shared_file
      destination_file = shared_file   
    end
    try_sudo "mkdir -p #{File.dirname(destination_file)}"
    top.upload(origin_file, destination_file)
  end
end

after "deploy", "link_config"
require 'capistrano/ext/multistage'
