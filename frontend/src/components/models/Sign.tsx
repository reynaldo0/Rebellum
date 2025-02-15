import * as THREE from "three";
import { useGLTF } from "@react-three/drei";
import { GLTF } from "three-stdlib";
import { useRef, useEffect } from "react";

// Define the GLTF result type
type GLTFResult = GLTF & {
  nodes: {
    Curve018: THREE.Mesh;
  };
  materials: {
    PaletteMaterial001: THREE.MeshStandardMaterial;
  };
};

export function Sign(props: JSX.IntrinsicElements["group"]) {
  const { nodes, materials } = useGLTF("/3D/sign-compressed.glb") as GLTFResult;
  
  // Create a ref for the group
  const groupRef = useRef<THREE.Group>(null);

  // Use effect to rotate the group
  useEffect(() => {
    const interval = setInterval(() => {
      if (groupRef.current) {
        groupRef.current.rotation.y += 0.01; // Rotate around the Y-axis
      }
    }, 16); // Approximately 60 FPS

    return () => clearInterval(interval); // Cleanup on unmount
  }, []);

  return (
    <group ref={groupRef} {...props} dispose={null}>
      <mesh
        castShadow
        receiveShadow
        geometry={nodes.Curve018.geometry}
        material={materials.PaletteMaterial001}
        position={[0.194, -1.028, -0.102]}
        rotation={[Math.PI / 2, 0, 0]}
        scale={13.619}
      />
    </group>
  );
}

// Preload the GLTF model
useGLTF.preload("/3D/sign-compressed.glb");
