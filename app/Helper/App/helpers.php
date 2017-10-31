<?php

use App\Models\Permiso;
use App\Models\Log;

function AsignarUsuarioTablas($id)
{
	Permiso::create(['tabla' => 'AUDITORIA', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'ARCHIVOS', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'ACTIVIDAD', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'CARGO_FUNCIONAL', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'CRONOGRAMA_GENERAL', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'DIRECTORIO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'ETAPA', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'INFORME', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'LOG', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'MACROPROCESO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'NORMATIVA_C', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'NORMATIVA_MACROPROCESO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'OBJETIVO_ESPECIFICO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'OBJETIVO_GENERAL', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'PLAN_ANUAL', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'PROCEDIMIENTO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'PROCEDIMIENTO_SP', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'PROCESO_MA', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'SUB_PROCESO', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'TIPO_NORMATIVA', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
	Permiso::create(['tabla' => 'USUARIOS', 'idusuario' => $id, 'leer' => true, 'crear' => false, 'editar' => false, 'eliminar' => false ]);
}

function RegistrarActividad($idusuario, $tabla, $accion)
{
	Log::create(['codUsu' => $idusuario, 'tabla' => $tabla, 'accion' => $accion]);
}