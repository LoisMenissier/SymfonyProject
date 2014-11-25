	

    #!/usr/bin/env bash
     
    # ----------------------------------------
    # https://github.com/Divi/VagrantBootstrap
    # ----------------------------------------
     
    # PARAMETERS
    # ----------
     
    # Database
    # --------
    DATABASE_NAME="symfony"
    # Replace "%" by "localhost" for local user only, 10.0.2.2 for host only or any IP address
    DATABASE_ROOT_HOST="%"
     
    # PHP
    # ---
    PHP_TIMEZONE="Europe/Paris"
     
    # APPLICATION
    # -----------
    APPLICATION_NAME="symfony"
     
    # SAMBA
    # -----
    # DO NOT FORGET TO CONFIGURE YOUR ".samba_config/smb.conf" "valid users" property !
    SAMBA_USER="vagrant"
    SAMBA_PASSWORD="vagrant"
     
    # PROJECT
    # -------
    PROJECT_GIT_REPOSITORY="https://github.com/symfony/symfony-standard"
    PROJECT_GIT_BRANCH="2.5"

