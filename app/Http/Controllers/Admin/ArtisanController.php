<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use File;

class ArtisanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Tylko zalogowani użytkownicy
        //$this->middleware('can:manage-artisan-commands'); // Tylko użytkownicy z uprawnieniem manage-artisan-commands
    }


    private function listControllers()
    {
        $controllers = [];
        $controllerNamespace = 'App\\Http\\Controllers\\Admin\\';

        // Pobieramy wszystkie pliki php z katalogu Controllers
        foreach (glob(app_path('Http/Controllers/Admin') . '/*.php') as $file) {
            // Pobieramy pełną nazwę pliku bez rozszerzenia
            $baseName = basename($file, '.php');

            // Dodajemy do listy z przestrzenią nazw
            $controllers[] = $controllerNamespace . $baseName;
        }

        // Przekazujemy listę kontrolerów do widoku
        return $controllers;
    }


    public function index()
    {

        $this->listControllers();
        $admin = file_get_contents(base_path('routes/maitenace.php'));
        $user = file_get_contents(base_path('routes/web.php'));
        $api = file_get_contents(base_path('routes/api.php'));
        
        return view('admin.artisan', ['routes_admin' => $admin, 'routes_user' => $user, 'routes_api' => $api, 'admin_kontrolery' => $this->listControllers()]);
    }

    public function createModel(Request $request)
    {
        $request->validate([
            'name' => 'required|string|alpha_dash',
            'fillable' => 'nullable|string',
            'relation_type' => 'nullable|in:hasOne,belongsTo', // Dostępne typy relacji
            'related_model' => 'nullable|string|alpha_dash', // Powiązany model musi już istnieć
            'foreign_key' => 'nullable|string|alpha_dash' // Klucz obcy
        ]);


        $modelPath = app_path();
        $modelPath = $modelPath."/Models/Admin/{$request->name}.php";
        
        // Sprawdź, czy model o tej nazwie już istnieje
        $modelClass = $modelPath."\\App\\Models\\Admin\\" . $request->name;
        if (class_exists($modelClass)) {
            return response()->json(['success' => false, 'message' => 'Model already exists']);
        }
    

    
        try {
            Artisan::call('make:model', ['name' => 'Admin/'.$request->name]);
    
            // Otwieramy plik
            $fileContents = File::get($modelPath);
    
            if ($request->has('fillable')) {
                $fillableArray = explode(',', $request->fillable);
    
                // Tworzymy ciąg znaków do wstawienia do pliku modelu
                $fillableString = "\n    protected \$fillable = ['" . implode("', '", $fillableArray) . "'];\n";
    
                // Dodajemy $fillable
                $position = strpos($fileContents, '{') + 1;
                $fileContents = substr_replace($fileContents, $fillableString, $position, 0);
            }
    
            if ($request->has('relation_type') && $request->has('related_model') && $request->has('foreign_key')) {
                // Tworzymy ciąg znaków z definicją relacji
                $relationString = "\n    public function " . lcfirst($request->related_model) . "()\n    {\n        return \$this->" . $request->relation_type . "('App\\Models\\" . $request->related_model . "', '" . $request->foreign_key . "');\n    }\n";
    
                // Dodajemy definicję relacji
                $position = strrpos($fileContents, '}');
                $fileContents = substr_replace($fileContents, $relationString, $position, 0);
            }
    
            // Zapisujemy zmiany
            File::put($modelPath, $fileContents);
    
            return response()->json(['success' => true, 'message' => 'Model created successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    

    public function editRoutes()
    {

        return view('admin.artisan');
    }


    public function updateRoutes(Request $request, $typ)
    {

        if($typ == 'admin'){
            $request->validate([
                'routes_admin' => 'required|string',
            ]);
    
            $routesAdmin = $request->input('routes_admin');
            file_put_contents(base_path('routes/maitenace.php'), $routesAdmin);
        }
        if($typ == 'user'){
            $request->validate([
                'routes_user' => 'required|string',
            ]);
    
            $routesUser = $request->input('routes_user');
            file_put_contents(base_path('routes/web.php'), $routesUser);
        }
        if($typ == 'api'){
            $request->validate([
                'routes_api' => 'required|string',
            ]);
    
            $routesApi = $request->input('routes_api');
            file_put_contents(base_path('routes/api.php'), $routesApi);
        }

        return redirect()->back()->with('message', 'Routing został zaktualizowany!');
    }

    public function storeController(Request $request)
    {
        $request->validate([
            'name' => 'required|string|alpha_dash',
            'model' => 'nullable|string|alpha_dash|exists:App\Models\Admin,name'
        ]);

        $commandArguments = ['name' => 'Admin/'.$request->name.'Controller'];

        if ($request->model) {
            $commandArguments['--model'] = $request->model;
        }

        Artisan::call('make:controller', $commandArguments);

        return redirect()->back()->with('message', 'Kontroler został utworzony!');
    }


}
