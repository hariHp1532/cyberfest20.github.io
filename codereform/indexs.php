<!DOCTYPE html>
<?php include('index.php'); ?>
<?php 
				 session_destroy(); ?>

<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/goldenlayout.min.js" integrity="sha256-NhJAZDfGgv4PiB+GVlSrPdh3uc75XXYSM4su8hgTchI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-base.css" integrity="sha256-oIDR18yKFZtfjCJfDsJYpTBv1S9QmxYopeqw2dO96xM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-dark-theme.css" integrity="sha256-ygw8PvSDJJUGLf6Q9KIQsYR3mOmiQNlDaxMLDOx9xL0=" crossorigin="anonymous" />

    <script>
        var require = {
            paths: {
                "vs": "https://unpkg.com/monaco-editor/min/vs",
                "monaco-vim": "https://unpkg.com/monaco-vim/dist/monaco-vim",
                "monaco-emacs": "https://unpkg.com/monaco-emacs/dist/monaco-emacs"
            }
        };
    </script>
    <script src="https://unpkg.com/monaco-editor/min/vs/loader.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.nls.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

    <script type="text/javascript" src="third_party/download.js"></script>

    <script type="text/javascript" src="js/ide.js"></script>

    <link type="text/css" rel="stylesheet" href="css/ide.css">

    <title>Code Reform</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="icon" href="./favicon.png" type="image/x-icon">
</head>

<body>
    <div id="site-navigation" class="ui small inverted menu">
        <div id="site-header" class="header item">
            <a href="/">
                <img id="site-icon" src="./favicon.png">
                <h2>Code Reform&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            </a>
        </div>
        <div class="left menu">
            
            <div class="item borderless">
                <select id="select-language" class="ui dropdown">
                    <option value="50" mode="c">C (GCC 9.2.0)</option>
                    <option value="51" mode="csharp">C# (Mono 6.6.0.161)</option>
                    <option value="54" mode="cpp">C++ (GCC 9.2.0)</option>
                    <option value="62" mode="java">Java (OpenJDK 13.0.1)</option>
                    <option value="63" mode="javascript">JavaScript (Node.js 12.14.0)</option>
                    <option value="68" mode="php">PHP (7.4.1)</option>
                    <option value="43" mode="plaintext">Plain Text</option>
                    <option value="69" mode="UNKNOWN">Prolog (GNU Prolog 1.4.5)</option>
                    <option value="71" mode="python">Python (3.8.1)</option>
                    <option value="72" mode="ruby">Ruby (2.7.0)</option>
                    <option value="74" mode="rust">TypeScript (3.7.4)</option>
                </select>
            </div>
			
			<div class="link item">		
			<h4 class="download-btn">Completed</h4>
			<h4 class="seconds">1200</h4>
			</div>
			
			<div class="item no-left-padding borderless">
                <button id="run-btn" class="ui primary labeled icon button"><i class="play icon"></i>Run (F9)</button>
            </div>
			
            <div class="item borderless">
                <div class="ui input">
                    <input id="command-line-arguments" type="text" placeholder="Command line arguments"></input>
                </div>
            </div>
            
			
        </div>
    </div>

    <div id="site-content">
	</div>

    <div id="site-modal" class="ui modal">
        <div class="header">
            <i class="close icon"></i>
            <span id="title"></span>
        </div>
        <div class="scrolling content"></div>
        <div class="actions">
            <div class="ui small labeled icon cancel button">
                <i class="remove icon"></i>
                Close (ESC)
            </div>
        </div>
    </div>

    <div id="site-settings" class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            <i class="cog icon"></i>
            Settings
        </div>
        <div class="content">
            <div class="ui form">
                <div class="inline fields">
                    <label>Editor Mode</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="normal" checked="checked">
                            <label>Normal</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="vim">
                            <label>Vim</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="emacs">
                            <label>Emacs</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
