import { useGLTF } from '@react-three/drei';
import { GroupProps, useFrame } from '@react-three/fiber';
import * as THREE from 'three';
import { GLTF } from 'three-stdlib';
import { useRef} from 'react';

type GLTFResult = GLTF & {
  nodes: {
    Base_Material004_0: THREE.Mesh;
    Base_Material_0: THREE.Mesh;
    top_Material003_0: THREE.Mesh;
    top_Material004_0: THREE.Mesh;
    Cylinder_Material001_0: THREE.Mesh;
    Cylinder001_Material001_0: THREE.Mesh;
    Cylinder002_Material001_0: THREE.Mesh;
    Cylinder003_Material001_0: THREE.Mesh;
    Cylinder004_Material001_0: THREE.Mesh;
    Cylinder005_Material001_0: THREE.Mesh;
    Cylinder006_Material001_0: THREE.Mesh;
    Cylinder007_Material001_0: THREE.Mesh;
    Cylinder008_Material001_0: THREE.Mesh;
    Cylinder009_Material001_0: THREE.Mesh;
    Cylinder010_Material001_0: THREE.Mesh;
    Cylinder011_Material001_0: THREE.Mesh;
  };
  materials: {
    'Material.001': THREE.MeshStandardMaterial;
    'Material.002': THREE.MeshStandardMaterial;
    'Material.003': THREE.MeshStandardMaterial;
    'Material.004': THREE.MeshStandardMaterial;
  };
};

export function Model(props: GroupProps) {
  const { nodes, materials } = useGLTF('/3D/rokok.glb') as unknown as GLTFResult;

  const meshRef = useRef<THREE.Group>(null); // Create a reference for the group

  // Animation logic
  useFrame(() => {
    if (meshRef.current) {
      meshRef.current.rotation.y += 0.01; // Rotate the group continuously
    }
  });

  return (
    <group {...props} dispose={null} ref={meshRef}>
      <group rotation={[-Math.PI / 2, 0, 0]} position={[0, -0.5, 0]} scale={0.008}>
        <group rotation={[Math.PI / 2, 0, 0]}>
          <group position={[0, -1.9, 0]} rotation={[-Math.PI / 2, 0, 0]} scale={120}>
            <mesh
              castShadow
              receiveShadow
              geometry={nodes.Base_Material004_0.geometry}
              material={materials['Material.004']}
            />
            <mesh
              castShadow
              receiveShadow
              geometry={nodes.Base_Material_0.geometry}
              material={materials['Material.002']}
            />
          </group>
          <group position={[0, -2.9, -43.019]} rotation={[-3.107, 0, 0]} scale={120}>
            <mesh
              castShadow
              receiveShadow
              geometry={nodes.top_Material003_0.geometry}
              material={materials['Material.003']}
            />
            <mesh
              castShadow
              receiveShadow
              geometry={nodes.top_Material004_0.geometry}
              material={materials['Material.004']}
            />
          </group>
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-75.509, -2.9, 18.563]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder001_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-78.1, -2.9, -3.565]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder002_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-51.062, -2.9, 7.515]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder003_Material001_0.geometry}
            material={materials['Material.001']}
            position={[22.159, 207.533, -2.439]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder004_Material001_0.geometry}
            material={materials['Material.001']}
            position={[68.346, -2.9, -22.223]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder005_Material001_0.geometry}
            material={materials['Material.001']}
            position={[55.241, -2.9, 8.403]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder006_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-16.989, -2.9, -23.811]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder007_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-21.25, -2.9, 21.96]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder008_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-51.591, -2.9, -28.933]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder009_Material001_0.geometry}
            material={materials['Material.001']}
            position={[80.866, -2.9, 13.916]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder010_Material001_0.geometry}
            material={materials['Material.001']}
            position={[83.901, -2.9, -11.951]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.Cylinder011_Material001_0.geometry}
            material={materials['Material.001']}
            position={[-201.053, -2.9, 21.96]}
            rotation={[-Math.PI / 2, 0, 0]}
            scale={120}
          />
        </group>
      </group>
    </group>
  );
}

useGLTF.preload('/3D/rokok.glb');
