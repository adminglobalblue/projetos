<?php
class Shell {
    private $SO;
    private $cmd;

    private $commands = [
        "WINNT" => [
            "getPwd" => "cd"
        ],
        "Linux" => [
            "getPwd" => "pwd"            
        ]
    ];

    public function __construct() {
        $this->SO = PHP_OS;
        $this->commands = $this->commands[$this->SO];
    }

    public function includeCommands() {
        foreach($this->commands as $key => $command) {
            $this->cmd = strtr($this->cmd, [":$key:" => $command]);
        }
    }

    public function ASrun() {
        if (!$this->cmd) return;
        $this->includeCommands();
        if ($this->SO == "WINNT"){
            pclose(popen("start /min ".$this->cmd."", "w")); 
        } elseif ($this->SO == "Linux") {
            shell_exec("nohup ".$this->cmd." > /dev/null &");  
        }
        return $this;
    }

    public function run() {
        if (!$this->cmd) return;
        $this->includeCommands();
        return shell_exec($this->cmd);
    }

    public function setCmd(string $cmd) {
        $this->cmd = trim($cmd);
        return $this;
    }

    public function getCmd() {
        return $this->cmd;
    }

    public function getPwd(){
        $this->cmd = $this->commands["getPwd"];
        return $this->run();
    }
}