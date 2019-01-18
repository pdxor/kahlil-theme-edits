@push('productnav')
  <li class="nav-item"><a class="flex-sm-fill nav-link" href="#technical-details">Technical Details</a></li>
@endpush

@push('content')

  <section class="related-resources" id="technical-details">
    <h3>{!! __('Technical Details', 'microcare-theme') !!}</h3>

<?php
	$technical_details = get_field('show_"technical_details"_block_for_this_product');
?>


				<table class="table table-striped table-condensed">
          <tbody>
              <?php echo ( get_field( 'appearance' ) )                                ?        '<tr><td>' . __("Appearance", "microcare_theme") .                       '</td><td>' . get_field( 'appearance' ) .                         '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'odor' ) )                                      ?        '<tr><td>' . __("Odor", "microcare_theme") .                             '</td><td>' . get_field( 'odor' ) .                               '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'pel_(ppm,_8-hr_twa)' ) )                       ?        '<tr><td>' . __("PEL (ppm, 8-hr TWA)", "microcare_theme") .              '</td><td>' . get_field( 'pel_(ppm,_8-hr_twa)' ) .                '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'boiling_point' ) )                             ?        '<tr><td>' . __("Boiling Point", "microcare_theme") .                    '</td><td>' . get_field( 'boiling_point' ) .                      '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'chemical_family' ) )                           ?        '<tr><td>' . __("Chemical Family", "microcare_theme") .                  '</td><td>' . get_field( 'chemical_family' ) .                    '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'f-gas_compliant' ) )                           ?        '<tr><td>' . __("F-Gas Compliant", "microcare_theme") .                  '</td><td><i class="text-success fa fa-check"></i>                 </td></tr>' : ''; ?>
              <?php echo ( get_field( 'evaporation_rate' ) )                          ?        '<tr><td>' . __("Evaporation Rate", "microcare_theme") .                 '</td><td>' . get_field( 'evaporation_rate' ) .                   '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'cleaning_strength_(kb)' ) )                    ?        '<tr><td>' . __("Cleaning Strength (Kb)", "microcare_theme") .           '</td><td>' . get_field( 'cleaning_strength_(kb)' ) .             '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'active_ingredients' ) )                        ?        '<tr><td>' . __("Active Ingredients", "microcare_theme") .               '</td><td>' . get_field( 'active_ingredients' ) .                 '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'flashpoint' ) )                                ?        '<tr><td>' . __("Flashpoint", "microcare_theme") .                       '</td><td>' . get_field( 'flashpoint' ) .                         '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'global_warming_rating_(100yr)' ) )             ?        '<tr><td>' . __("Global Warming Rating (100yr)", "microcare_theme") .    '</td><td>' . get_field( 'global_warming_rating_(100yr)' ) .      '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'organic_content_(g/l)' ) )                     ?        '<tr><td>' . __("VOC Organic Content (g/L)", "microcare_theme") .            '</td><td>' . get_field( 'organic_content_(g/l)' ) .              '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'ozone_impact' ) )                              ?        '<tr><td>' . __("Ozone Impact (O.D.P.)", "microcare_theme") .                     '</td><td>' . get_field( 'ozone_impact' ) .                       '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'vapor_density' ) )                             ?        '<tr><td>' . __("Vapor Density", "microcare_theme") .                    '</td><td>' . get_field( 'vapor_density' ) .                      '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'reach_registration_compliant' ) )              ?        '<tr><td>' . __("REACH & ELINCS Compliant", "microcare_theme") .         '</td><td><i class="text-success fa fa-check"></i>                 </td></tr>' : ''; ?>
              <?php echo ( get_field( 'rohs_and_weee_compliant' ) )                   ?        '<tr><td>' . __("RoHS and WEEE Compliant", "microcare_theme") .          '</td><td><i class="text-success fa fa-check"></i>                 </td></tr>' : ''; ?>
              <?php echo ( get_field( 'safety_rating' ) != 'na' )                     ?        '<tr><td>' . __("Safety Rating", "microcare_theme") .                    '</td><td>' . get_field( 'safety_rating' ) .                      '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'specific_gravity' ) )                          ?        '<tr><td>' . __("Specific Gravity", "microcare_theme") .                 '</td><td>' . get_field( 'specific_gravity' ) .                   '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'surface_tension' ) )                           ?        '<tr><td>' . __("Surface Tension", "microcare_theme") .                  '</td><td>' . get_field( 'surface_tension' ) .                    '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'vapor_density' ) )                             ?        '<tr><td>' . __("Vapor Density", "microcare_theme") .                    '</td><td>' . get_field( 'vapor_densit' ) .                       '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'viscosity' ) )                                 ?        '<tr><td>' . __("Viscosity", "microcare_theme") .                        '</td><td>' . get_field( 'viscosity' ) .                          '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'vapor_pressure_@_20ºc' ) )                     ?        '<tr><td>' . __("Vapor Pressure @ 20ºC", "microcare_theme") .            '</td><td>' . get_field( 'vapor_pressure_@_20ºc' ) .              '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'absorbency' ) )                                ?        '<tr><td>' . __("Absorbency", "microcare_theme") .                       '</td><td>' . get_field( 'absorbency' ) .                         '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'basis_weight' ) )                              ?        '<tr><td>' . __("Basis Weight", "microcare_theme") .                     '</td><td>' . get_field( 'basis_weight' ) .                       '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'color' ) )                                     ?        '<tr><td>' . __("Color", "microcare_theme") .                            '</td><td>' . get_field( 'color' ) .                              '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'edges' ) )                                     ?        '<tr><td>' . __("Edges", "microcare_theme") .                            '</td><td>' . get_field( 'edges' ) .                              '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'material' ) )                                  ?        '<tr><td>' . __("Material", "microcare_theme") .                         '</td><td>' . get_field( 'material' ) .                           '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'packaging_note' ) )                            ?        '<tr><td>' . __("Packaging Note", "microcare_theme") .                   '</td><td>' . get_field( 'packaging_note' ) .                     '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'particulate' ) )                               ?        '<tr><td>' . __("Particulate", "microcare_theme") .                      '</td><td>' . get_field( 'particulate' ) .                        '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'surface/texture' ) )                           ?        '<tr><td>' . __("Surface/Texture", "microcare_theme") .                  '</td><td>' . get_field( 'surface/texture' ) .                    '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'core_details' ) )                              ?        '<tr><td>' . __("Core Details", "microcare_theme") .                     '</td><td>' . get_field( 'core_details' ) .                       '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'paper_details' ) )                             ?        '<tr><td>' . __("Paper Details", "microcare_theme") .                    '</td><td>' . get_field( 'paper_details' ) .                      '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'printer' ) )                                   ?        '<tr><td>' . __("Printer", "microcare_theme") .                          '</td><td>' . get_field( 'printer' ) .                            '</td></tr>' : ''; ?>
              <?php echo ( get_field( 'roll_details' ) )                              ?        '<tr><td>' . __("Roll Details", "microcare_theme") .                     '</td><td>' . get_field( 'roll_details' ) .                       '</td></tr>' : ''; ?>

          </tbody>
				</table>
      </section>
@endpush
