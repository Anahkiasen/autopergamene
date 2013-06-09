
set :application, "autopergamene"
set :repository,  "git://github.com/Anahkiasen/autopergamene.git"

# Git settings
set :scm, :git
set :deploy_via, :remote_cache
set :branch, "master"
set :copy_exclude, [".git",".gitignore"]
set :keep_releases, 2

# Server settings
server "autopergamene.eu", :app, :web, :db, :primary => true
set :deploy_to, "/home/www/#{application}"

# SSH Settings
set :user, "root"
set :ssh_options, {:forward_agent => true}

# Options
logger.level = Logger::IMPORTANT
default_run_options[:pty] = true

######################################################################
### TASKS
######################################################################

after "deploy:update",  "deploy:cleanup"
after "deploy:update",  "deploy:create_symlink"
after "deploy:cleanup", "deploy:laravel_cleanup"

STDOUT.sync
namespace :deploy do

  task :update do
    info "Deploying", 3
    info "Fetching latest release", 2
    info "Updating repository"
    update_code

    info "Installing dependencies", 2
    composer
    bower
    basset

    info "Cleaning up", 2
    info "Cleaning up old releases"
  end

  task :finalize_update do
    info "Setting permissions"
    run "chmod -R +x #{current_release}/app/storage"
    run "chown -R www-data:www-data #{current_release}/app/storage"
    run "chown -R www-data:www-data #{current_release}/public/packages/anahkiasen/illuminage"
  end

  # Package managers ----------------------------------------------- /

  task :composer do
    info "Installing Composer dependencies"
    run_in_folder "composer install"
  end

  task :bower do
    info "Installing Bower components"
    run_in_folder "bower install"
  end

  task :basset do
    info "Compiling assets"
    run_in_folder "php artisan basset:build -f --env=production"
  end

  task :laravel_cleanup do
    info "Cleaning Laravel cache"
    run_in_folder "php artisan basset --tidy-up"
    run_in_folder "php artisan cache:clear"
  end

  # Helpers -------------------------------------------------------- /

  # Runs a command in the current release folder
  def run_in_folder(command)
    run "cd #{current_release};#{command}"
  end

  # Displays info text
  def info(text, level = 1)
    case level
      when 1
        print "|--- #{text}\n".blue
      when 2
        print "|-- #{text}\n".green
      when 3
        print "|- #{text}\n".yellow
    end
  end
end
