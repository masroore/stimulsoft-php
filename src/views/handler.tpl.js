StiHelper.prototype.process = function (args, callback) {
if (args) {
    if (args.event === 'BeginProcessData' || args.event === 'EndProcessData') {
        let databases = {{databases}};
        if (!databases.includes(args.database))
            return null;

        args.preventDefault = true;
    }

    if (callback)
        args.async = true;

    let command = {};
    for (let p in args) {
        if (p === 'report') {
            if (args.report && (args.event === 'CreateReport' || args.event === 'SaveReport' || args.event === 'SaveAsReport'))
                command.report = JSON.parse(args.report.saveToJsonString());
        } else if (p === 'settings' && args.settings) command.settings = args.settings;
        else if (p === 'data') command.data = Stimulsoft.System.Convert.toBase64String(args.data);
        else if (p === 'variables') command[p] = this.getVariables(args[p]);
        else command[p] = args[p];
    }

    let sendText = Stimulsoft.Report.Dictionary.StiSqlAdapterService.encodeCommand(command);
    let handlerCallback = function (args) {
        if (!Stimulsoft.System.StiString.isNullOrEmpty(args.notice))
            Stimulsoft.System.StiError.showError(args.notice, true, args.success);
        if (callback) callback(args);
    }
    Stimulsoft.Helper.send(sendText, handlerCallback);
}
}

StiHelper.prototype.send = function (json, callback) {
    let request = new XMLHttpRequest();
    try {
        request.open('post', this.url, true);
        request.setRequestHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        request.setRequestHeader('Cache-Control', 'max-age=0');
        request.setRequestHeader('Pragma', 'no-cache');
        request.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token}}')
        request.timeout = this.timeout * 1000;
        request.onload = function () {
            if (request.status === 200) {
                let responseText = request.responseText;
                request.abort();

                try {
                    let args = Stimulsoft.Report.Dictionary.StiSqlAdapterService.decodeCommandResult(responseText);
                    if (args.report) {
                        let json = args.report;
                        args.report = new Stimulsoft.Report.StiReport();
                        args.report.load(json);
                    }

                    callback(args);
                } catch (e) {
                    Stimulsoft.System.StiError.showError(e.message);
                }
            } else {
                Stimulsoft.System.StiError.showError('Server response error: [' + request.status + '] ' + request.statusText);
            }
        };
        request.onerror = function (e) {
            let errorMessage = 'Connect to remote error: [' + request.status + '] ' + request.statusText;
            Stimulsoft.System.StiError.showError(errorMessage);
        };
        request.send(json);
    } catch (e) {
        let errorMessage = 'Connect to remote error: ' + e.message;
        Stimulsoft.System.StiError.showError(errorMessage);
        request.abort();
    }
};

StiHelper.prototype.isNullOrEmpty = function (value) {
    return value == null || value === '' || value === undefined;
}

StiHelper.prototype.getVariables = function (variables) {
    if (variables) {
        for (let variable of variables) {
            if (variable.type === 'DateTime' && variable.value != null)
                variable.value = variable.value.toString('YYYY-MM-DD HH:mm:SS');
        }
    }

    return variables;
}

function StiHelper(url, timeout) {
    this.url = url;
    this.timeout = timeout;

    if (Stimulsoft && Stimulsoft.StiOptions) {
        Stimulsoft.StiOptions.WebServer.url = url;
        Stimulsoft.StiOptions.WebServer.timeout = timeout;
    }
}

Stimulsoft = Stimulsoft || {};
Stimulsoft.Helper = new StiHelper('{{url}}', {{timeout}});
jsHelper = typeof jsHelper !== 'undefined' ? jsHelper : Stimulsoft.Helper;
