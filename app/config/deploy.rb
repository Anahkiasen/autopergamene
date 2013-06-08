# logger.level = Logger::IMPORTANT

set :application, "Autopergamene"
set :repository,  "git://github.com/Anahkiasen/autopergamene.git"

# Git settings
set :scm, :git
set :deploy_via, :remote_cache
set :branch, "master"
set :copy_exclude, [".git",".gitignore"]
set :keep_releases, 2

# Server settings
server "autopergamene.eu", :app, :web, :db, :primary => true
set :deploy_to, "/home/www/autopergamene"

# SSH Settings
set :user, "root"
set :ssh_options, {:forward_agent => true}

# Options
set :normalize_asset_timestamps, false
ssh_options[:forward_agent] = true
default_run_options[:pty]   = true

###
# TASKS
###

after "deploy:update", "deploy:cleanup"

namespace :deploy do

	task :update do
		update_code
		symlink
		set_permissions
		composer
		bower
		basset
	end

  # Package managers ----------------------------------------------- /

	task :composer do
		run "cd #{current_release};composer install"
	end

	task :bower do
		run "cd #{current_release};bower install"
	end

	task :basset do
		run "cd #{current_release};php artisan basset:build -f --env=production"
		run "cd #{current_release};php artisan basset --tidy-up"
	end

  task :symlink do
    run "ln -nfs #{current_release} #{deploy_to}/production"
  end

  task :set_permissions do
  	run "chmod -R +x #{current_release}/app/storage"
  	run "chown -R www-data:www-data #{current_release}/app/storage"
  end
end
